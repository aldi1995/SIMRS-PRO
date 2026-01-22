<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'

const metrics = [
  { title: 'BOR (Bed Occupancy Rate)', value: '68%' },
  { title: 'LOS (Length of Stay)', value: '3.4 hari' },
  { title: 'Pasien Hari Ini', value: '128' },
  { title: 'Pendapatan Hari Ini', value: 'Rp 87 jt' }
]
</script>

<template>
  <Head title="Dashboard Manajemen" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Dashboard Manajemen
    </h2>

    <div class="grid-4 mb-6">
      <v-card
        v-for="item in metrics"
        :key="item.title"
        class="glass-panel pa-4"
      >
        <p class="muted-text text-caption">{{ item.title }}</p>
        <h3 class="text-h6 font-weight-bold mt-1">{{ item.value }}</h3>
      </v-card>
    </div>

    <v-card class="glass-panel pa-4">
      <h3 class="font-weight-bold mb-2">Ringkasan Operasional RS</h3>
      <ul class="muted-text">
        <li>✔ BOR ideal di range aman</li>
        <li>⚠ Farmasi: 3 obat hampir habis</li>
        <li>✔ IGD normal</li>
        <li>⚠ Radiologi antrean meningkat</li>
      </ul>
    </v-card>

  </AppLayout>
</template>

<style scoped>
.grid-4 {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 16px;
}
</style>
