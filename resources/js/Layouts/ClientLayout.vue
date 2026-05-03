<script setup lang="ts">
</script>

<template>
  <div class="min-h-screen bg-[#fdfcf9] flex flex-col items-center">
    <div class="w-full max-w-md p-6 bg-white shadow-sm min-h-screen">
      <header class="mb-8">
        <div class="text-2xl font-serif text-[var(--terracotta)] text-center">Hotel Name</div>
      </header>
      
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>
