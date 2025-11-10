<script setup>
import { Head, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const projects = props.projects || []; // viene del backend
</script>

<template>
  <Head title="Proyectos" />

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Tus proyectos</h1>

        <div v-if="projects.length === 0" class="text-gray-500">
          No tienes proyectos aún.
        </div>

        <ul v-else class="space-y-2">
          <li v-for="project in projects" :key="project.id" class="border p-3 rounded hover:shadow">
            {{ project.name }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
