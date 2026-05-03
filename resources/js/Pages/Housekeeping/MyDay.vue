<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import EmployeeLayout from '@/layouts/EmployeeLayout.vue'

defineProps<{ tasks: any[] }>()
</script>

<template>
  <Head title="My Day" />
  <EmployeeLayout>
    <div class="space-y-4">
      <h2 class="text-xl font-bold text-slate-800">My Tasks</h2>
      <div v-for="task in tasks" :key="task.id" class="p-4 bg-white rounded shadow-sm border border-slate-200">
        Room {{ task.room.number }} - {{ task.status }}
      </div>
    </div>
  </EmployeeLayout>
</template>
