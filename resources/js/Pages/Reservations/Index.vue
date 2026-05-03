<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import FrontDeskLayout from '@/layouts/FrontDeskLayout.vue'
import ReservationGrid from '@/components/calendar/ReservationGrid.vue'

defineProps<{ reservations: any[] }>()
</script>

<template>
  <Head title="Reservations" />
  <FrontDeskLayout>
    <div class="space-y-6">
      <h2 class="text-2xl font-serif">Reservations Calendar</h2>
      <ReservationGrid />
    </div>
  </FrontDeskLayout>
</template>
