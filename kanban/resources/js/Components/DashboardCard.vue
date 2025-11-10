<template>
  <div
    @click="handleClick"
    class="cursor-pointer bg-white shadow-md hover:shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center transition"
  >
    <slot name="icon"></slot>
    <h3 class="mt-3 text-lg font-semibold text-gray-800">{{ title }}</h3>
    <p class="text-gray-500 text-sm">{{ description }}</p>
  </div>
</template>

<script setup>
import { useRouter } from '@inertiajs/vue3'

const props = defineProps({
  title: String,
  description: String,
  route: String,
})

const router = useRouter()

const handleClick = () => {
  if (props.route) {
    router.visit(props.route)
  }
}
</script>
