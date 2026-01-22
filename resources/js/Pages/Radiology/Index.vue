<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip } from 'vuetify/components'

const headers = [
  { title: 'No Order', key: 'order' },
  { title: 'Pasien', key: 'patient' },
  { title: 'Pemeriksaan', key: 'exam' },
  { title: 'Dokter', key: 'doctor' },
  { title: 'Status', key: 'status' }
]

const orders = ref([
  { order: 'RAD-001', patient: 'Ahmad Fauzi', exam: 'Rontgen Thorax', doctor: 'dr. Andi', status: 'Proses' },
  { order: 'RAD-002', patient: 'Siti Rahma', exam: 'USG Abdomen', doctor: 'dr. Rina', status: 'Selesai' }
])
</script>

<template>
  <Head title="Radiologi" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">
      Radiologi
    </h2>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="orders" class="dark-table">
        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Selesai' ? 'green' : 'blue'">
            {{ value }}
          </v-chip>
        </template>
      </v-data-table>
    </v-card>

  </AppLayout>
</template>
