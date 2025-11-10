<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    projects: Array
});

const showModal = ref(false);
const form = ref({
    name: '',
    description: ''
});

function createProject() {
    Inertia.post('/projects', form.value, {
        onSuccess: () => {
            showModal.value = false;
            form.value.name = '';
            form.value.description = '';
        }
    });
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Mis Proyectos</h1>
                <button @click="showModal = true"
                    class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                    + Nuevo Proyecto
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="project in projects" :key="project.id"
                    class="bg-white rounded-xl shadow-lg p-6 hover:shadow-2xl transition cursor-pointer border border-gray-200">
                    <h3 class="text-xl font-bold text-gray-800">{{ project.name }}</h3>
                    <p class="text-gray-600 mt-2">{{ project.description || 'Sin descripción' }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ project.tasks_count }} tareas</span>
                        <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full">Activo</span>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-xl p-8 max-w-lg w-full">
                    <h2 class="text-2xl font-bold mb-6">Crear Nuevo Proyecto</h2>
                    <form @submit.prevent="createProject">
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                            <input v-model="form.name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Descripción (opcional)</label>
                            <textarea v-model="form.description" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        <div class="flex gap-4">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                                Crear Proyecto
                            </button>
                            <button type="button" @click="showModal = false"
                                class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>