<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import { VCard, VDataTable, VChip, VBtn } from 'vuetify/components'

const headers = [
  { title: 'No Invoice', key: 'invoice' },
  { title: 'Pasien', key: 'patient' },
  { title: 'Layanan', key: 'service' },
  { title: 'Total', key: 'total' },
  { title: 'Status', key: 'status' },
  { title: 'Aksi', key: 'actions', sortable: false }
]

const bills = ref([
  { invoice: 'INV-001', patient: 'Ahmad Fauzi', service: 'Rawat Jalan', total: 350000, status: 'Belum Bayar' },
  { invoice: 'INV-002', patient: 'Siti Rahma', service: 'IGD', total: 780000, status: 'Lunas' }
])

const formatCurrency = (value) =>
  new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(value)
</script>

<template>
  <Head title="Billing" />
  <AppLayout>

    <div class="d-flex justify-space-between mb-4">
      <div>
        <h2 class="text-h5 font-weight-bold text-white">Billing</h2>
        <p class="muted-text text-caption">Daftar tagihan pasien</p>
      </div>
      <v-btn color="primary" prepend-icon="mdi-plus">Buat Invoice</v-btn>
    </div>

    <v-card class="glass-panel pa-2">
      <v-data-table :headers="headers" :items="bills">

        <template #item.total="{ value }">
          <strong>{{ formatCurrency(value) }}</strong>
        </template>

        <template #item.status="{ value }">
          <v-chip size="small" :color="value === 'Lunas' ? 'green' : 'orange'">
            {{ value }}
          </v-chip>
        </template>

        <template #item.actions>
          <v-btn size="small" variant="text" color="primary">Detail</v-btn>
        </template>

      </v-data-table>
    </v-card>

  </AppLayout>
</template>
