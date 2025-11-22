<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Import Excel</h1>
                <p class="text-gray-600">Upload your Excel file to import data</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <form class="text-center">
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-xl p-8 mb-6 cursor-pointer transition-all hover:border-blue-400 hover:bg-blue-50"
                        @click="$refs.file.click()"
                    >
                        <div class="text-blue-500 mb-4">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-2">Click to select Excel file</p>
                        <p class="text-sm text-gray-400">.xlsx, .xls, .csv</p>
                    </div>

                    <input
                        type="file"
                        ref="file"
                        @change="handleFileSelect"
                        accept=".xlsx,.xls,.csv"
                        class="hidden"
                    >
                    <div  v-if="file">
                        {{ this.file.name}}
                        {{ this.file.size}}
                        {{ this.file.type}}
                        <button v-if="file"
                                @click.prevent="importFile"
                                class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-green-600 hover:to-green-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105"
                        >
                            Import Excel File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Import",
    layout: MainLayout,

    data(){
        return {
            file: null,
        }
    },

    methods: {
        handleFileSelect(event) {
            this.file = event.target.files[0];
        },

        importFile(){
            const formData = new FormData();
            formData.append("file", this.file);

            this.$inertia.post('/projects/import', formData, {
                onSuccess: (page) => {
                    console.log('File uploaded successfully', page);
                },
                onError: (errors) => {
                    console.log('Upload failed', errors);
                }
            })
        }
    }
}
</script>

