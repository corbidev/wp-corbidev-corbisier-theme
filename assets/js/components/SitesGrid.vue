<script setup>
defineProps({ sites: Array })
</script>

<template>
  <section class="max-w-7xl mx-auto p-6 bg-gray-100 dark:bg-black min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Projects</h1>
    <div class="grid md:grid-cols-3 gap-6">
      <SiteCard v-for="site in sites" :key="site.lien" :site="site" />
    </div>
  </section>
</template>

<script>
import SiteCard from './SiteCard.vue'
export default { components: { SiteCard } }
</script>
