<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip } from 'vuetify/components'

const headers = [
  { title: 'No SEP', key: 'sep' },
  { title: 'Pasien', key: 'patient' },
  { title: 'Diagnosa', key: 'diagnosis' },
  { title: 'Tarif INA-CBG', key: 'tariff' },
  { title: 'Status Klaim', key: 'status' }
]

const claims = ref([
  { sep: 'SEP-001', patient: 'Ahmad Fauzi', diagnosis: 'ISPA', tariff: 1200000, status: 'Pending' },
  { sep: 'SEP-002', patient: 'Siti Rahma', diagnosis: 'Tifus', tariff: 2400000, status: 'Disetujui' }
])

const formatCurrency = (value) =>
  new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value)
</script>

<template>
  <Head title="Klaim BPJS" />
  <AppLayout>

    <h2 class="text-h5 font-weight-bold text-white mb-4">
      Klaim BPJS
    </h2>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="claims">

        <template #item.tariff="{ value }">
          {{ formatCurrency(value) }}
        </template>

        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Disetujui' ? 'green' : 'orange'">
            {{ value }}
          </v-chip>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>
