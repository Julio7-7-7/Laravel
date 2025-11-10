<script setup>
import { Head, usePage } from '@inertiajs/vue3'

const { props } = usePage()
const tasks = props.tasks || [] // por ahora puede estar vacío
</script>

<template>
  <Head title="Tareas" />

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Tus tareas</h1>

        <div v-if="tasks.length === 0" class="text-gray-500">
          No tienes tareas asignadas aún.
        </div>

        <ul v-else class="space-y-2">
          <li v-for="task in tasks" :key="task.id" class="border p-3 rounded hover:shadow">
            {{ task.title }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
