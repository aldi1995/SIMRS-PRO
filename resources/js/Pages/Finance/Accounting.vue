<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const accounts = ref([
  {
    date: '2026-01-24',
    description: 'Pendapatan Rawat Jalan',
    type: 'Pendapatan',
    amount: 12800000
  },
  {
    date: '2026-01-24',
    description: 'Pembelian Obat Farmasi',
    type: 'Pengeluaran',
    amount: 5600000
  },
  {
    date: '2026-01-25',
    description: 'Pendapatan IGD',
    type: 'Pendapatan',
    amount: 7200000
  },
  {
    date: '2026-01-25',
    description: 'Gaji Pegawai',
    type: 'Pengeluaran',
    amount: 19800000
  }
])
</script>

<template>
<AppLayout>

  <!-- HEADER -->
  <div class="mb-6">
    <h1 class="text-h5 font-weight-bold">Akuntansi Rumah Sakit</h1>
    <p class="text-muted">Ringkasan pemasukan & pengeluaran keuangan</p>
  </div>

  <!-- SUMMARY -->
  <v-row dense class="mb-6">
    <v-col cols="12" md="4">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Total Pendapatan</div>
        <div class="stat-value text-success">Rp 187.000.000</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="4">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Total Pengeluaran</div>
        <div class="stat-value text-error">Rp 112.500.000</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="4">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Laba Bersih</div>
        <div class="stat-value text-primary">Rp 74.500.000</div>
      </v-card>
    </v-col>
  </v-row>

  <!-- TABLE -->
  <v-card class="glass-card pa-6">

    <div class="d-flex justify-space-between align-center mb-4">
      <strong class="text-h6">Jurnal Transaksi</strong>

      <div class="d-flex gap-2">
        <v-btn variant="outlined">Export</v-btn>
        <v-btn color="primary" prepend-icon="mdi-plus">
          Tambah Transaksi
        </v-btn>
      </div>
    </div>

    <v-table class="table-glass">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Keterangan</th>
          <th>Tipe</th>
          <th>Jumlah</th>
          <th width="140">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="trx in accounts" :key="trx.description">
          <td>{{ trx.date }}</td>
          <td>{{ trx.description }}</td>

          <td>
            <v-chip 
              :color="trx.type === 'Pendapatan' ? 'green' : 'red'" 
              size="small"
            >
              {{ trx.type }}
            </v-chip>
          </td>

          <td class="font-weight-bold">
            Rp {{ trx.amount.toLocaleString() }}
          </td>

          <td class="d-flex gap-2">
            <v-btn size="small" variant="outlined">Detail</v-btn>
            <v-btn size="small" color="warning">Edit</v-btn>
            <v-btn size="small" color="red">Hapus</v-btn>
          </td>
        </tr>
      </tbody>
    </v-table>

  </v-card>

</AppLayout>
</template>

<style scoped>
.stat-title {
  font-size: 0.85rem;
  color: #94a3b8;
}

.stat-value {
  font-size: 1.7rem;
  font-weight: bold;
}

.table-glass {
  color: white;
}
</style>
