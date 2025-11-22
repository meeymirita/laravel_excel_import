<template>
    <div class="mb-4">
        <nav class="relative bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <Link
                                    :href="route('project.index')"
                                    :active="route().current('project.index')"
                                    :class="['rounded-md px-3 py-2 text-sm font-medium',
                                     $page.component === 'Project/Index'
                                      ? 'bg-gray-900 text-white'
                                      : 'text-gray-300 hover:bg-white/5 hover:text-white'
                                     ]"
                                >
                                    Project
                                </Link>
                                <Link
                                    :href="route('project.import')"
                                    :active="route().current('project.import')"
                                    :class="['rounded-md px-3 py-2 text-sm font-medium',
                                     $page.component === 'Project/Import'
                                      ? 'bg-gray-900 text-white'
                                      : 'text-gray-300 hover:bg-white/5 hover:text-white'
                                     ]"
                                >
                                    Import
                                </Link>
                                <Link
                                    :href="route('task.index')"
                                    :active="route().current('task.index')"
                                    :class="['rounded-md px-3 py-2 text-sm font-medium',
                                     $page.component === 'Task/Index'
                                      ? 'bg-gray-900 text-white'
                                      : 'text-gray-300 hover:bg-white/5 hover:text-white'
                                     ]"
                                >
                                    Task
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
                <div class="space-y-1 px-2 pt-2 pb-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                    <a href="#" aria-current="page" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Team</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Projects</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
                </div>
            </el-disclosure>
        </nav>
    </div>
</template>
<script>
import {Link} from "@inertiajs/vue3";
export default {
    name: "Navigation",
    components: {Link},
}
</script>
<style scoped>

</style>
