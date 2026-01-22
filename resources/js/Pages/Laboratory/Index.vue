<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip } from 'vuetify/components'

const headers = [
  { title: 'No Order', key: 'order' },
  { title: 'Pasien', key: 'patient' },
  { title: 'Jenis Tes', key: 'test' },
  { title: 'Dokter', key: 'doctor' },
  { title: 'Status', key: 'status' }
]

const orders = ref([
  { order: 'LAB-001', patient: 'Ahmad Fauzi', test: 'Hematologi', doctor: 'dr. Andi', status: 'Menunggu' },
  { order: 'LAB-002', patient: 'Siti Rahma', test: 'Kimia Darah', doctor: 'dr. Rina', status: 'Selesai' }
])
</script>

<template>
  <Head title="Laboratorium" />
  <AppLayout>

    <h2 class="text-h5 text-white font-weight-bold mb-4">
      Laboratorium
    </h2>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="orders" class="dark-table">
        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Selesai' ? 'green' : 'orange'">
            {{ value }}
          </v-chip>
        </template>
      </v-data-table>
    </v-card>

  </AppLayout>
</template>
