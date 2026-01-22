<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

const stats = [
  { label: 'Rawat Jalan', value: 320 },
  { label: 'Rawat Inap', value: 110 },
  { label: 'IGD', value: 78 },
  { label: 'Rujukan', value: 42 }
]
</script>

<template>
  <Head title="Statistik RS" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Statistik Rumah Sakit
    </h2>

    <v-card class="glass-panel pa-4">
      <table class="stats-table">
        <tr v-for="s in stats" :key="s.label">
          <td>{{ s.label }}</td>
          <td class="text-right font-weight-bold">{{ s.value }}</td>
        </tr>
      </table>
    </v-card>

  </AppLayout>
</template>

<style scoped>
.stats-table {
  width: 100%;
  border-collapse: collapse;
}
.stats-table td {
  padding: 12px 0;
  border-bottom: 1px solid rgba(255,255,255,0.06);
}
</style>
