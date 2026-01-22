<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { VCard, VChip } from 'vuetify/components'

const triage = [
  { name: 'Ahmad Fauzi', level: 'Merah', note: 'Gawat' },
  { name: 'Siti Rahma', level: 'Kuning', note: 'Urgent' }
]
</script>

<template>
  <Head title="IGD Triage" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">IGD / Triage</h2>

    <v-card class="glass-panel pa-4">
      <div v-for="t in triage" :key="t.name" class="triage-row">
        <span>{{ t.name }}</span>
        <v-chip :color="t.level === 'Merah' ? 'red' : 'orange'">{{ t.level }}</v-chip>
      </div>
    </v-card>

  </AppLayout>
</template>

<style scoped>
.triage-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  color: white;
}
</style>
