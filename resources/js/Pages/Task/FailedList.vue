<template>
    <div class="container mx-auto">
        <div>
            <Link class="test-sm" :href="route('task.index')">Back</Link>
        </div>
        <div v-if="failedRows"
             class="not-prose overflow-auto rounded-lg bg-white outline outline-white/5 dark:bg-gray-950/50">
            <div class="my-8 overflow-hidden">
                <table class="w-full table-auto border-collapse text-sm">
                    <thead>
                    <tr>
                        <th :class="table.th_header">
                            id
                        </th>
                        <th :class="table.th_header">
                            key
                        </th>
                        <th :class="table.th_header">
                            Row
                        </th>
                        <th :class="table.th_header">
                            message
                        </th>
                        <th :class="table.th_header">
                            Created_at
                        </th>

                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                    <tr v-for="failed in failedRows.data" :key="failed.id">
                        <td class="border-b border-gray-100 p-4 pl-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            {{ failed.id }}
                        </td>
                        <td class="border-b border-gray-100 p-4 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            {{ failed.key }}
                        </td>
                        <td class="border-b border-gray-100 p-4 pr-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            {{ failed.row }}
                        </td>
                        <td class="border-b border-gray-100 p-4 pr-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            {{ failed.message }}
                        </td>
                        <td class="border-b border-gray-100 p-4 pr-8 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            {{ failed.created_at }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div v-if="failedRows && failedRows.meta">
            <Pagination :meta="failedRows.meta"/>
        </div>
    </div>
</template>
<script>
import {Link} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
export default {
    name: "Index",
    layout: MainLayout,
    components: {
        Link,
        Pagination,
    },
    props: [
        'failedRows'
    ],
    data() {
        return {
            table: {
                th_header: "border-b border-gray-200 p-4 pt-0 pb-3 pl-8 text-left font-medium text-gray-400 dark:border-gray-600 dark:text-gray-200",
                tr_: "",
                td_: "",

            },
        }
    }


}

import MainLayout from "@/Layouts/MainLayout.vue";
</script>
<style scoped>

</style>
