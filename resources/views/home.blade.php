<x-layout.app>
    <!-- Hero Section -->
    <section class="hero min-h-[70vh] bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse max-w-7xl mx-auto px-4">
            <div class="w-full lg:w-1/2">
                <img src="kanban.webp" alt="Kanban Board Preview"
                     class="rounded-lg shadow-2xl max-w-full"
                     onerror="this.src='https://placehold.co/600x400?text=Kanban+Preview';this.onerror='';">
            </div>
            <div class="w-full lg:w-1/2">
                <h1 class="text-5xl font-bold">Rei's Kanban</h1>
                <p class="py-6">Organize your tasks and manage projects efficiently with our intuitive Kanban board. Boost productivity with drag-and-drop simplicity.</p>
                <div class="flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">My Boards</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                        <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-base-100 w-full">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Key Features</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>
                        <h3 class="card-title">Intuitive Interface</h3>
                        <p>Organize tasks across customizable columns with our user-friendly interface designed for productivity.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="card-title">Task Management</h3>
                        <p>Create, update, and delete tasks with detailed information including priorities, assignments and deadlines.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="card-title">Team Collaboration</h3>
                        <p>Share boards with team members and collaborate on tasks to keep everyone in sync.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="card-title">Mobile Responsive</h3>
                        <p>Access your boards from any device - desktop, tablet, or mobile phone with our responsive design.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="card-title">Secure Authentication</h3>
                        <p>Rest easy with our secure login and registration system featuring email verification.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="card bg-base-200">
                    <div class="card-body">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-primary text-primary-content mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <h3 class="card-title">Customizable Workflow</h3>
                        <p>Adapt the board to your specific workflow needs with different task stages and priorities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-base-200 w-full">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to boost your productivity?</h2>
            <p class="mb-8 text-lg">Join thousands of users who organize their work with Rei's Kanban.</p>
            <div class="flex flex-wrap justify-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Sign Up Now</a>
                    <a href="{{ route('login') }}" class="btn btn-outline btn-lg">Login</a>
                @endauth
            </div>
        </div>
    </section>
</x-layout.app>
