<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const employees = ref([
  {
    name: 'dr. Andi Wijaya',
    role: 'Dokter Spesialis Penyakit Dalam',
    unit: 'Poli Dalam',
    phone: '0812-3344-5566',
    status: 'Aktif'
  },
  {
    name: 'Siti Rahmawati',
    role: 'Perawat Senior',
    unit: 'Rawat Inap',
    phone: '0821-9988-7722',
    status: 'Aktif'
  },
  {
    name: 'Budi Santoso',
    role: 'Staff Administrasi',
    unit: 'Front Office',
    phone: '0813-6677-8899',
    status: 'Aktif'
  },
  {
    name: 'Rina Oktavia',
    role: 'Apoteker',
    unit: 'Farmasi',
    phone: '0819-1234-5678',
    status: 'Cuti'
  }
])
</script>

<template>
<AppLayout>

  <!-- HEADER -->
  <div class="mb-6">
    <h1 class="text-h5 font-weight-bold">Data Pegawai</h1>
    <p class="text-muted">Manajemen seluruh pegawai rumah sakit</p>
  </div>

  <!-- STATS -->
  <v-row dense class="mb-6">
    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Total Pegawai</div>
        <div class="stat-value">87</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Dokter</div>
        <div class="stat-value">23</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Perawat</div>
        <div class="stat-value">38</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Staff Non Medis</div>
        <div class="stat-value">26</div>
      </v-card>
    </v-col>
  </v-row>

  <!-- TABLE -->
  <v-card class="glass-card pa-6">

    <div class="d-flex justify-space-between align-center mb-4">
      <strong class="text-h6">Daftar Pegawai</strong>

      <div class="d-flex gap-2">
        <v-text-field dense placeholder="Cari pegawai..." hide-details />
        <v-btn color="primary" prepend-icon="mdi-plus">
          Tambah Pegawai
        </v-btn>
      </div>
    </div>

    <v-table class="table-glass">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Unit</th>
          <th>Telepon</th>
          <th>Status</th>
          <th width="160">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="emp in employees" :key="emp.name">
          <td class="font-weight-medium">{{ emp.name }}</td>
          <td>{{ emp.role }}</td>
          <td>{{ emp.unit }}</td>
          <td>{{ emp.phone }}</td>

          <td>
            <v-chip 
              :color="emp.status === 'Aktif' ? 'green' : 'orange'" 
              size="small"
            >
              {{ emp.status }}
            </v-chip>
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
