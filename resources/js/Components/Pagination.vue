<template>
    <div v-if="meta.links.length > 3">
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#"
                   class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#"
                   class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">10</span>
                        of
                        <span class="font-medium">97</span>
                        results
                    </p>
                </div>
                <div>
                    <nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md shadow-xs">
                        <template v-for="link in meta.links">
                            <Link v-if="link.url" :href="link.url"
                                  :class="['relative hidden items-center px-4 py-2 text-sm font-semibold md:inline-flex',
                                  'inset-ring inset-ring-gray-300 focus:z-20 focus:outline-offset-0',
                                  link.active
                                       ? 'z-10 bg-indigo-600 border-indigo-500 text-white'
                                       : 'text-gray-900 hover:bg-gray-50'
                                  ]"
                                  v-html="link.label"
                            />
                        </template>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "Pagination",
    components: {
        Link
    },
    props: [
        'meta'
    ],
}
</script>
