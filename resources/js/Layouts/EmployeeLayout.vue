<script setup lang="ts">
</script>

<template>
  <div class="min-h-screen bg-slate-50 flex flex-col">
    <header class="h-16 bg-[var(--terracotta)] text-white flex items-center justify-center font-bold">
      MY DAY
    </header>
    
    <main class="flex-1 p-4">
      <slot />
    </main>

    <footer class="h-16 bg-white border-t border-slate-200 flex justify-around items-center text-xs text-slate-500">
      <div>Tasks</div>
      <div>Schedule</div>
      <div>Profile</div>
    </footer>
  </div>
</template>
