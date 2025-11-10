<script setup>
import { defineProps } from 'vue'

const props = defineProps({
    user: Object
})
</script>

<template>
  <div class="border rounded-lg p-4 hover:shadow-lg transition">
    <h4 class="font-semibold text-gray-800 mb-2">Tareas de {{ props.user.name }}</h4>
    <p class="text-gray-500 text-sm">Consulta y gestiona tus tareas asignadas</p>
    <a href="/tasks" class="text-blue-500 mt-2 inline-block">Ir a Tareas →</a>
  </div>
</template>
