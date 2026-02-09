<script setup>
defineProps({ sites: Array })
</script>

<template>
  <section class="max-w-7xl mx-auto p-6 min-h-screen bg-gray-100 dark:bg-black transition-colors">
    <h1 class="text-3xl font-bold mb-8 text-gray-900 dark:text-gray-100">
      Projects
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <SiteCard v-for="site in sites" :key="site.lien" :site="site" />
    </div>
  </section>
</template>

<script>
import SiteCard from './SiteCard.vue'
export default { components: { SiteCard } }
</script>
