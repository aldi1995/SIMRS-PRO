<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const search = ref('')
const rows = ref([
  {
    invoice: 'INV-20260125-001',
    patient: 'Ahmad Fauzi',
    service: 'Rawat Inap',
    total: 1250000,
    status: 'Belum Lunas'
  },
  {
    invoice: 'INV-20260125-002',
    patient: 'Siti Rahma',
    service: 'Rawat Jalan',
    total: 420000,
    status: 'Lunas'
  }
])
</script>

<template>
  <AppLayout>
    <v-card class="glass-card pa-6">

      <div class="d-flex justify-space-between mb-4">
        <div>
          <h2 class="text-h6 font-weight-bold">Billing Pasien</h2>
          <p class="text-muted">Tagihan pasien aktif</p>
        </div>

        <v-btn color="primary">
          <v-icon left>mdi-plus</v-icon>
          Tambah Invoice
        </v-btn>
      </div>

      <v-text-field
        v-model="search"
        label="Cari pasien / invoice"
        prepend-inner-icon="mdi-magnify"
        density="compact"
        class="mb-4"
      />

      <v-data-table
        :items="rows"
        :search="search"
        class="glass-table"
      >
        <template #headers>
          <tr>
            <th>Invoice</th>
            <th>Pasien</th>
            <th>Layanan</th>
            <th>Total</th>
            <th>Status</th>
            <th class="text-right">Aksi</th>
          </tr>
        </template>

        <template #item="{ item }">
          <tr>
            <td>{{ item.invoice }}</td>
            <td>{{ item.patient }}</td>
            <td>{{ item.service }}</td>
            <td>Rp {{ item.total.toLocaleString() }}</td>

            <td>
              <v-chip
                :color="item.status === 'Lunas' ? 'green' : 'orange'"
                size="small"
              >
                {{ item.status }}
              </v-chip>
            </td>

            <td class="text-right">
              <v-btn icon size="small"><v-icon>mdi-eye</v-icon></v-btn>
              <v-btn icon size="small"><v-icon>mdi-pencil</v-icon></v-btn>
              <v-btn icon size="small" color="red"><v-icon>mdi-delete</v-icon></v-btn>
            </td>
          </tr>
        </template>

      </v-data-table>
    </v-card>
  </AppLayout>
</template>
