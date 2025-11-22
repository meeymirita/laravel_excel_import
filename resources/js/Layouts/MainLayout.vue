<template>
<div class="w-96 mx-auto">
    <h1>my app</h1>
    <div
        class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
    >
        <Link
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            Dashboard
        </Link>

        <Link
            :href="route('project.index')"
            :active="route().current('project.index')"
        >
            Project
        </Link>
        <Link
            :href="route('project.import')"
            :active="route().current('project.import')"
        >
            Import
        </Link>
        <Link
            :href="route('task.index')"
            :active="route().current('task.index')"
        >
            Task
        </Link>
    </div>
    <slot></slot>
</div>
</template>
<script>
import {Link} from "@inertiajs/vue3";

export default {
    name: "MainLayout",
    components: {Link},
}
</script>
<style scoped>

</style>
