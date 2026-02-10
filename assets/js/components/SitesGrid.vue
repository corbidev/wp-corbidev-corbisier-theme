<script setup>
defineProps({ sites: Array })
</script>

<template>
  <section class="max-w-7xl mx-auto p-6 grid md:grid-cols-3 gap-6 bg-gray-100 dark:bg-black min-h-screen">
    <SiteCard v-for="site in sites" :key="site.lien" :site="site" />
  </section>
</template>

<script>
import SiteCard from './SiteCard.vue'
export default { components: { SiteCard } }
</script>
