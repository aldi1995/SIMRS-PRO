<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip, VBtn } from 'vuetify/components'

const headers = [
  { title: 'No Resep', key: 'rx' },
  { title: 'Pasien', key: 'patient' },
  { title: 'Obat', key: 'drug' },
  { title: 'Jumlah', key: 'qty' },
  { title: 'Status', key: 'status' },
  { title: 'Aksi', key: 'actions' }
]

const prescriptions = ref([
  { rx: 'RX-001', patient: 'Ahmad Fauzi', drug: 'Paracetamol', qty: 10, status: 'Menunggu' },
  { rx: 'RX-002', patient: 'Siti Rahma', drug: 'Amoxicillin', qty: 20, status: 'Selesai' }
])
</script>

<template>
  <Head title="Farmasi" />
  <AppLayout>

    <div class="d-flex justify-space-between mb-4">
      <h2 class="text-h5 text-white font-weight-bold">
        Farmasi
      </h2>
      <v-btn color="primary">Tambah Resep</v-btn>
    </div>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="prescriptions" class="dark-table">

        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Selesai' ? 'green' : 'orange'">
            {{ value }}
          </v-chip>
        </template>

        <template #item.actions>
          <v-btn size="small" variant="text" color="primary">
            Proses
          </v-btn>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>
