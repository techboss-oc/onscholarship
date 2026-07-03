<?php

use App\Http\Controllers\ProfileController;
use App\Models\University;
use App\Models\Scholarship;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentStudentController;
use App\Http\Controllers\Agent\AgentApplicationController;
use App\Http\Controllers\Agent\AgentManagerController;
use App\Http\Controllers\Agent\AgencyUserController;
use App\Http\Controllers\Agent\PartnerController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Define all routes in a reusable function to register them at both root and /hainan prefix
function registerAppRoutes($prefix = '')
{
    Route::prefix($prefix)->group(function () use ($prefix) {
        // Auth Routes
        Route::middleware('guest')->group(function () use ($prefix) {
            Route::get('register', [RegisteredUserController::class, 'create'])
                ->name(empty($prefix) ? 'register' : "{$prefix}.register");

            Route::post('register', [RegisteredUserController::class, 'store'])
                ->middleware('throttle:register');

            Route::get('login', function () {
                return view('auth.selection');
            })->name(empty($prefix) ? 'login' : "{$prefix}.login");

            Route::get('login/{type}', [AuthenticatedSessionController::class, 'create'])
                ->name(empty($prefix) ? 'login.type' : "{$prefix}.login.type")
                ->where('type', 'student|agent|admin|super-admin');

            Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('throttle:login');

            Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name(empty($prefix) ? 'password.request' : "{$prefix}.password.request");

            Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name(empty($prefix) ? 'password.email' : "{$prefix}.password.email");

            Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name(empty($prefix) ? 'password.reset' : "{$prefix}.password.reset");

            Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name(empty($prefix) ? 'password.store' : "{$prefix}.password.store");
        });

        Route::middleware('auth')->group(function () use ($prefix) {
            Route::get('verify-email', EmailVerificationPromptController::class)
                ->name(empty($prefix) ? 'verification.notice' : "{$prefix}.verification.notice");

            Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name(empty($prefix) ? 'verification.verify' : "{$prefix}.verification.verify");

            Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name(empty($prefix) ? 'verification.send' : "{$prefix}.verification.send");

            Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name(empty($prefix) ? 'password.confirm' : "{$prefix}.password.confirm");

            Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

            Route::put('password', [PasswordController::class, 'update'])
                ->name(empty($prefix) ? 'password.update' : "{$prefix}.password.update");

            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name(empty($prefix) ? 'logout' : "{$prefix}.logout");
        });
        Route::get('/', function () {
            $universities = University::where('is_active', true)->withCount('programs')->take(3)->get();
            $scholarships = Scholarship::where('is_active', true)->where('deadline', '>', now())->take(3)->get();
            $testimonials = Testimonial::where('is_active', true)->take(3)->get();

            // Fallback if BlogPost model doesn't have the scope or table is not there
            $recentPosts = class_exists(\App\Models\BlogPost::class)
                ? \App\Models\BlogPost::published()->latest('published_at')->take(3)->get()
                : collect([]);

            return view('welcome', compact('universities', 'scholarships', 'testimonials', 'recentPosts'));
        })->name(empty($prefix) ? 'home' : "{$prefix}.home");

        Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name(empty($prefix) ? 'about' : "{$prefix}.about");
        Route::get('/services', [\App\Http\Controllers\PageController::class, 'services'])->name(empty($prefix) ? 'services' : "{$prefix}.services");
        Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name(empty($prefix) ? 'contact' : "{$prefix}.contact");
        Route::post('/contact', [\App\Http\Controllers\PageController::class, 'submitContact'])->name(empty($prefix) ? 'contact.submit' : "{$prefix}.contact.submit")->middleware('throttle:contact');

        Route::get('/universities', [\App\Http\Controllers\PageController::class, 'universities'])->name(empty($prefix) ? 'universities.index' : "{$prefix}.universities.index");
        Route::get('/universities/{id}', [\App\Http\Controllers\PageController::class, 'universityShow'])->name(empty($prefix) ? 'universities.show' : "{$prefix}.universities.show");

        Route::get('/scholarships', [\App\Http\Controllers\PageController::class, 'scholarships'])->name(empty($prefix) ? 'scholarships.index' : "{$prefix}.scholarships.index");
        Route::get('/scholarships/{id}', [\App\Http\Controllers\PageController::class, 'scholarshipShow'])->name(empty($prefix) ? 'scholarships.show' : "{$prefix}.scholarships.show");

        Route::get('/sitemap.xml', [\App\Http\Controllers\PageController::class, 'sitemap'])->name(empty($prefix) ? 'sitemap' : "{$prefix}.sitemap");
        Route::get('/robots.txt', [\App\Http\Controllers\PageController::class, 'robots'])->name(empty($prefix) ? 'robots' : "{$prefix}.robots");

        Route::get('/blog', [\App\Http\Controllers\PageController::class, 'blog'])->name(empty($prefix) ? 'blog.index' : "{$prefix}.blog.index");
        Route::get('/blog/{slug}', [\App\Http\Controllers\PageController::class, 'blogShow'])->name(empty($prefix) ? 'blog.show' : "{$prefix}.blog.show");

        Route::get('/programs', [\App\Http\Controllers\PageController::class, 'programs'])->name(empty($prefix) ? 'programs.index' : "{$prefix}.programs.index");
        Route::get('/programs/{id}', [\App\Http\Controllers\PageController::class, 'programShow'])->name(empty($prefix) ? 'programs.show' : "{$prefix}.programs.show");

        Route::get('/dashboard', function () use ($prefix) {
            $user = auth()->user();

            if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
                return redirect()->route(empty($prefix) ? 'admin.dashboard' : "{$prefix}.admin.dashboard");
            } elseif ($user->hasRole('agent')) {
                return redirect()->route(empty($prefix) ? 'agent.dashboard' : "{$prefix}.agent.dashboard");
            }

            return redirect()->route(empty($prefix) ? 'student.dashboard' : "{$prefix}.student.dashboard");
        })->middleware(['auth', 'verified'])->name(empty($prefix) ? 'dashboard' : "{$prefix}.dashboard");

        Route::middleware(['auth', 'verified'])->group(function () use ($prefix) {
            Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name(empty($prefix) ? 'notifications.index' : "{$prefix}.notifications.index");
            Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name(empty($prefix) ? 'notifications.read' : "{$prefix}.notifications.read");
            Route::post('/notifications/read-all', [\App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name(empty($prefix) ? 'notifications.readAll' : "{$prefix}.notifications.readAll");
        });

        // Admin Routes
        Route::middleware(['auth', 'role:admin'])->prefix('admin')->name(empty($prefix) ? 'admin.' : "{$prefix}.admin.")->group(function () {
            Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('/agents', [\App\Http\Controllers\Admin\AgentController::class, 'index'])->name('agents.index');
            Route::post('/agents/{id}/approve', [\App\Http\Controllers\Admin\AgentController::class, 'approve'])->name('agents.approve');
            Route::post('/agents/{id}/suspend', [\App\Http\Controllers\Admin\AgentController::class, 'suspend'])->name('agents.suspend');
            Route::get('/contact-requests', [\App\Http\Controllers\Admin\ContactRequestController::class, 'index'])->name('contact_requests.index');
            Route::get('/contact-requests/{id}', [\App\Http\Controllers\Admin\ContactRequestController::class, 'show'])->name('contact_requests.show');
            Route::post('/contact-requests/{id}/status', [\App\Http\Controllers\Admin\ContactRequestController::class, 'updateStatus'])->name('contact_requests.status');
            Route::get('/universities', [\App\Http\Controllers\Admin\UniversityController::class, 'index'])->name('universities.index');
            Route::get('/universities/create', [\App\Http\Controllers\Admin\UniversityController::class, 'create'])->name('universities.create');
            Route::post('/universities', [\App\Http\Controllers\Admin\UniversityController::class, 'store'])->name('universities.store');
            Route::get('/universities/{id}/edit', [\App\Http\Controllers\Admin\UniversityController::class, 'edit'])->name('universities.edit');
            Route::put('/universities/{id}', [\App\Http\Controllers\Admin\UniversityController::class, 'update'])->name('universities.update');
            Route::delete('/universities/{id}', [\App\Http\Controllers\Admin\UniversityController::class, 'destroy'])->name('universities.destroy');
            Route::get('/scholarships', [\App\Http\Controllers\Admin\ScholarshipController::class, 'index'])->name('scholarships.index');
            Route::get('/scholarships/create', [\App\Http\Controllers\Admin\ScholarshipController::class, 'create'])->name('scholarships.create');
            Route::post('/scholarships', [\App\Http\Controllers\Admin\ScholarshipController::class, 'store'])->name('scholarships.store');
            Route::get('/scholarships/{id}/edit', [\App\Http\Controllers\Admin\ScholarshipController::class, 'edit'])->name('scholarships.edit');
            Route::put('/scholarships/{id}', [\App\Http\Controllers\Admin\ScholarshipController::class, 'update'])->name('scholarships.update');
            Route::delete('/scholarships/{id}', [\App\Http\Controllers\Admin\ScholarshipController::class, 'destroy'])->name('scholarships.destroy');

            // Programs
            Route::get('/programs', [\App\Http\Controllers\Admin\ProgramController::class, 'index'])->name('programs.index');
            Route::get('/programs/create', [\App\Http\Controllers\Admin\ProgramController::class, 'create'])->name('programs.create');
            Route::post('/programs', [\App\Http\Controllers\Admin\ProgramController::class, 'store'])->name('programs.store');
            Route::get('/programs/{id}/edit', [\App\Http\Controllers\Admin\ProgramController::class, 'edit'])->name('programs.edit');
            Route::put('/programs/{id}', [\App\Http\Controllers\Admin\ProgramController::class, 'update'])->name('programs.update');
            Route::delete('/programs/{id}', [\App\Http\Controllers\Admin\ProgramController::class, 'destroy'])->name('programs.destroy');

            // Students
            Route::get('/students', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students.index');
            Route::get('/students/{id}', [\App\Http\Controllers\Admin\StudentController::class, 'show'])->name('students.show');
            Route::get('/students/{id}/documents/{documentId}', [\App\Http\Controllers\Admin\StudentController::class, 'viewDocument'])->name('students.documents.view');
            Route::get('/students/{id}/documents/{documentId}/stream', [\App\Http\Controllers\Admin\StudentController::class, 'streamDocument'])->name('students.documents.stream');

            // Applications
            Route::get('/applications', [\App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('applications.index');
            Route::get('/applications/{id}', [\App\Http\Controllers\Admin\ApplicationController::class, 'show'])->name('applications.show');
            Route::patch('/applications/{id}/status', [\App\Http\Controllers\Admin\ApplicationController::class, 'updateStatus'])->name('applications.status');
            Route::get('/application-fees', [\App\Http\Controllers\Admin\ApplicationFeeController::class, 'index'])->name('application_fees.index');
            Route::put('/application-fees/settings', [\App\Http\Controllers\Admin\ApplicationFeeController::class, 'updateSettings'])->name('application_fees.settings');
            Route::patch('/application-fees/{id}', [\App\Http\Controllers\Admin\ApplicationFeeController::class, 'updateApplicationFee'])->name('application_fees.update');

            // Settings
            Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
            Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

            // Blog Categories
            Route::get('/blog-categories', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'index'])->name('blog_categories.index');
            Route::get('/blog-categories/create', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'create'])->name('blog_categories.create');
            Route::post('/blog-categories', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'store'])->name('blog_categories.store');
            Route::get('/blog-categories/{id}/edit', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'edit'])->name('blog_categories.edit');
            Route::put('/blog-categories/{id}', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'update'])->name('blog_categories.update');
            Route::delete('/blog-categories/{id}', [\App\Http\Controllers\Admin\BlogCategoryController::class, 'destroy'])->name('blog_categories.destroy');

            // Blog Posts
            Route::get('/blog', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog.index');
            Route::get('/blog/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blog.create');
            Route::post('/blog', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blog.store');
            Route::get('/blog/{id}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.update');
            Route::delete('/blog/{id}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blog.destroy');
        });

        // Agent Routes
        Route::middleware(['auth', 'verified', 'role:agent'])->prefix('agent')->name(empty($prefix) ? 'agent.' : "{$prefix}.agent.")->group(function () {
            Route::get('/pending', function () {
                return view('agent.pending');
            })->name('pending');

            Route::middleware('agent.approved')->group(function () {
                Route::get('/dashboard', [AgentStudentController::class, 'dashboard'])->name('dashboard');
                Route::get('/profile', [AgentStudentController::class, 'profile'])->name('profile');

                // Applications
                Route::get('/applications', [AgentApplicationController::class, 'index'])->name('applications.index');
                Route::get('/applications/create', [AgentApplicationController::class, 'create'])->name('applications.create');
                Route::post('/applications', [AgentApplicationController::class, 'store'])->name('applications.store');
                Route::get('/applications/payment', [AgentApplicationController::class, 'payment'])->name('applications.payment');
                Route::post('/applications/payment', [AgentApplicationController::class, 'completePayment'])->name('applications.payment.complete');
                Route::get('/applications/{id}/service-charge', [AgentApplicationController::class, 'serviceChargePayment'])->name('applications.service_charge');
                Route::post('/applications/{id}/service-charge', [AgentApplicationController::class, 'completeServiceChargePayment'])->name('applications.service_charge.complete');
                Route::get('/applications/{id}', [AgentApplicationController::class, 'show'])->name('applications.show');
                Route::get('/find-programs', [\App\Http\Controllers\ProgramSearchController::class, 'index'])->name('programs.search');
                Route::get('/scholarships', [\App\Http\Controllers\ScholarshipSearchController::class, 'index'])->name('scholarships');

                // Students Manage
                Route::get('/students', [AgentStudentController::class, 'index'])->name('students.index');
                Route::get('/students/add', [AgentStudentController::class, 'addStudent'])->name('students.add');
                Route::post('/students/add', [AgentStudentController::class, 'storeStudent'])->name('students.store');

                // Invitations
                Route::get('/invitations', [AgentStudentController::class, 'invitations'])->name('invitations.index');

                // Managers Manage
                Route::get('/managers', [AgentManagerController::class, 'index'])->name('managers.index');
                Route::post('/managers', [AgentManagerController::class, 'store'])->name('managers.store');

                // Agency Manage
                Route::get('/agency-users', [AgencyUserController::class, 'index'])->name('agency.index');
                Route::post('/agency-users', [AgencyUserController::class, 'store'])->name('agency.store');

                // Partner Views
                Route::get('/sub-agencies', [PartnerController::class, 'subAgencies'])->name('sub-agencies.index');
                Route::get('/commissions', [PartnerController::class, 'commissions'])->name('commissions.index');
            });
        });

        // Student Routes
        Route::middleware(['auth', 'verified', 'role:student'])->prefix('student')->name(empty($prefix) ? 'student.' : "{$prefix}.student.")->group(function () {
            Route::get('/dashboard', [\App\Http\Controllers\Student\StudentController::class, 'dashboard'])->name('dashboard');
            Route::get('/profile', [\App\Http\Controllers\Student\StudentController::class, 'profile'])->name('profile');
            Route::post('/profile', [\App\Http\Controllers\Student\StudentController::class, 'updateProfile'])->name('profile.update');
            Route::get('/documents', [\App\Http\Controllers\Student\StudentController::class, 'documents'])->name('documents');
            Route::post('/documents', [\App\Http\Controllers\Student\StudentController::class, 'uploadDocument'])->name('documents.upload');
            Route::get('/applications', [\App\Http\Controllers\Student\StudentController::class, 'applications'])->name('applications.index');
            Route::get('/applications/create', [\App\Http\Controllers\Student\StudentController::class, 'createApplication'])->name('applications.create');
            Route::post('/applications', [\App\Http\Controllers\Student\StudentController::class, 'storeApplication'])->name('applications.store');
            Route::get('/applications/payment', [\App\Http\Controllers\Student\StudentController::class, 'applicationPayment'])->name('applications.payment');
            Route::post('/applications/payment', [\App\Http\Controllers\Student\StudentController::class, 'completeApplicationPayment'])->name('applications.payment.complete');
            Route::get('/applications/{id}/service-charge', [\App\Http\Controllers\Student\StudentController::class, 'serviceChargePayment'])->name('applications.service_charge');
            Route::post('/applications/{id}/service-charge', [\App\Http\Controllers\Student\StudentController::class, 'completeServiceChargePayment'])->name('applications.service_charge.complete');
            Route::get('/find-programs', [\App\Http\Controllers\ProgramSearchController::class, 'index'])->name('programs.search');
            Route::get('/scholarships', [\App\Http\Controllers\ScholarshipSearchController::class, 'index'])->name('scholarships');

            // Wishlist
            Route::get('/wishlist', [\App\Http\Controllers\Student\WishlistController::class, 'index'])->name('wishlist.index');
            Route::post('/wishlist/toggle', [\App\Http\Controllers\Student\WishlistController::class, 'toggle'])->name('wishlist.toggle');

            // Onboarding
            Route::get('/onboarding', [\App\Http\Controllers\Student\StudentController::class, 'showOnboarding'])->name('onboarding');
            Route::post('/onboarding', [\App\Http\Controllers\Student\StudentController::class, 'saveOnboarding'])->name('onboarding.save');
        });

        Route::middleware('auth')->group(function () use ($prefix) {
            Route::get('/profile', [ProfileController::class, 'edit'])->name(empty($prefix) ? 'profile.edit' : "{$prefix}.profile.edit");
            Route::patch('/profile', [ProfileController::class, 'update'])->name(empty($prefix) ? 'profile.update' : "{$prefix}.profile.update");
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name(empty($prefix) ? 'profile.destroy' : "{$prefix}.profile.destroy");
        });
    });
}

// Register routes at root (for http://hainan.test)
registerAppRoutes();

// Register routes at /hainan prefix (for http://localhost/hainan)
registerAppRoutes('hainan');
