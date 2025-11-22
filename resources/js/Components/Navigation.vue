<template>
    <div class="">
        <nav class="bg-white shadow-xl border-b border-gray-100 sticky top-0 z-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center group cursor-pointer">
                            <div class="h-9 w-9 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 shadow-md">
                                <span class="text-white font-bold text-sm">A</span>
                            </div>
                            <span class="ml-3 text-xl font-bold text-gray-900 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                ExcelApp
                            </span>
                        </div>

                        <div class="hidden sm:ml-10 sm:flex sm:space-x-2">
                            <Link
                                :href="route('project.index')"
                                :class="['relative px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-300 flex items-center group',
                                    $page.component === 'Project/Index'
                                    ? 'text-blue-600 bg-blue-50 shadow-md border border-blue-100'
                                    : 'text-gray-600 hover:text-blue-600 hover:bg-blue-50 hover:shadow-md border border-transparent hover:border-blue-100'
                                ]"
                            >
                                <svg class="w-5 h-5 mr-2.5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                </svg>
                                Projects
                                <div v-if="$page.component === 'Project/Index'" class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-blue-500 rounded-full"></div>
                            </Link>

                            <Link
                                :href="route('project.import')"
                                :class="['relative px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-300 flex items-center group',
                                    $page.component === 'Project/Import'
                                    ? 'text-green-600 bg-green-50 shadow-md border border-green-100'
                                    : 'text-gray-600 hover:text-green-600 hover:bg-green-50 hover:shadow-md border border-transparent hover:border-green-100'
                                ]"
                            >
                                <svg class="w-5 h-5 mr-2.5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                                </svg>
                                Import
                                <div v-if="$page.component === 'Project/Import'" class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-green-500 rounded-full"></div>
                            </Link>

                            <Link
                                :href="route('task.index')"
                                :class="['relative px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-300 flex items-center group',
                                    $page.component === 'Task/Index'
                                    ? 'text-purple-600 bg-purple-50 shadow-md border border-purple-100'
                                    : 'text-gray-600 hover:text-purple-600 hover:bg-purple-50 hover:shadow-md border border-transparent hover:border-purple-100'
                                ]"
                            >
                                <svg class="w-5 h-5 mr-2.5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Tasks
                                <div v-if="$page.component === 'Task/Index'" class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-1 h-1 bg-purple-500 rounded-full"></div>
                            </Link>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="hidden lg:block">
                            <div class="relative group">
                                <input
                                    type="text"
                                    placeholder="Search projects..."
                                    class="w-72 pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-md group-hover:shadow-md"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 transition-colors group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <button class="relative p-2.5 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-all duration-300 group">
                            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.5 3.75a6 6 0 0 0-6 6v2.25l-2.47 2.47a.75.75 0 0 0 .53 1.28h15.88a.75.75 0 0 0 .53-1.28L16.5 12V9.75a6 6 0 0 0-6-6z"/>
                            </svg>
                            <span class="absolute -top-1 -right-1 h-5 w-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform shadow-sm">3</span>
                        </button>

                        <div class="relative"
                             @mouseenter="showProfileMenu = true"
                             @mouseleave="showProfileMenu = false">

                            <button class="flex items-center space-x-3 text-sm focus:outline-none p-1 rounded-xl hover:bg-gray-50 transition-colors duration-300">
                                <div class="h-9 w-9 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                    <span class="text-white font-medium text-sm">JD</span>
                                </div>
                                <div class="hidden xl:block text-left">
                                    <p class="font-semibold text-gray-900">John Doe</p>
                                    <p class="text-xs text-gray-500">Admin</p>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 transition-transform"
                                     :class="{ 'rotate-180': showProfileMenu }"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 transition-all duration-300 transform origin-top-right"
                                 :class="[
                                     showProfileMenu
                                     ? 'opacity-100 visible scale-100 translate-y-0'
                                     : 'opacity-0 invisible scale-95 translate-y-2'
                                 ]"
                                 @mouseenter="showProfileMenu = true"
                                 @mouseleave="showProfileMenu = false">

                                <div class="p-2">
                                    <div class="px-3 py-2 border-b border-gray-100">
                                        <p class="text-sm font-semibold text-gray-900">John Doe</p>
                                        <p class="text-xs text-gray-500">john@example.com</p>
                                    </div>

                                    <!-- Пункты меню -->
                                    <a href="#" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200 group/menu">
                                        <svg class="w-4 h-4 mr-3 text-gray-400 group-hover/menu:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Profile
                                    </a>

                                    <a href="#" class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200 group/menu">
                                        <svg class="w-4 h-4 mr-3 text-gray-400 group-hover/menu:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Settings
                                    </a>

                                    <div class="border-t border-gray-100 mt-2 pt-2">
                                        <a href="#" class="flex items-center px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200 group/menu">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Sign Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    name: "Navigation",
    components: { Link },
    data() {
        return {
            showProfileMenu: false
        }
    }
}
</script>

<style scoped>
.relative {
    position: relative;
    z-index: 60;
}

.absolute {
    z-index: 70;
}

* {
    transition-property: color, background-color, border-color, transform, box-shadow, opacity;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 200ms;
}
</style>
