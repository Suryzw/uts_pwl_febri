<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Dashboard') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your profile and account settings') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Points -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition-shadow lg:row-span-2">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Poin</h3>
                <p class="text-3xl font-bold text-indigo-600">{{ $user->points }}</p>
            </div>

            <!-- Submission Count -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition-shadow">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Jumlah Submission</h3>
                <p class="text-3xl font-bold text-indigo-600">{{ $submissionCount }}</p>
            </div>

            <!-- Daily Submission -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition-shadow">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Submission Harian</h3>
                <p class="text-3xl font-bold text-indigo-600">{{ $dailySubmission }}</p>
            </div>

            <!-- Weekly Submission -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition-shadow">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Submission Mingguan</h3>
                <p class="text-3xl font-bold text-indigo-600">{{ $weeklySubmission }}</p>
            </div>

            <!-- Monthly Submission -->
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition-shadow">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Submission Bulanan</h3>
                <p class="text-3xl font-bold text-indigo-600">{{ $monthlySubmission }}</p>
            </div>
        </div>
    </div>
</x-layouts.app>
