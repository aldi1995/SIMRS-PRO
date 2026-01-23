<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const records = [
  {
    id: 1,
    patient: 'Ahmad Fauzi',
    rm: 'RM001',
    doctor: 'dr. Andi Wijaya',
    diagnosis: 'Hipertensi',
    date: '2025-01-22'
  },
  {
    id: 2,
    patient: 'Siti Rahma',
    rm: 'RM002',
    doctor: 'dr. Rina Kartika',
    diagnosis: 'Diabetes Mellitus',
    date: '2025-01-21'
  }
]
</script>

<template>
  <Head title="Rekam Medis" />

  <AppLayout>

    <!-- HEADER -->
    <div class="page-header mb-6">
      <div>
        <h1 class="page-title">Rekam Medis</h1>
        <p class="text-muted">Daftar rekam medis pasien rumah sakit</p>
      </div>

      <Link href="/medical-records/soap">
        <v-btn color="primary" prepend-icon="mdi-plus">
          Tambah Rekam Medis
        </v-btn>
      </Link>
    </div>

    <!-- TABLE -->
    <v-card class="glass-card pa-4">

      <v-table density="comfortable">
        <thead>
          <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Dokter</th>
            <th>Diagnosa</th>
            <th>Tanggal</th>
            <th width="160">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in records" :key="item.id">
            <td>{{ item.rm }}</td>
            <td>{{ item.patient }}</td>
            <td>{{ item.doctor }}</td>
            <td>{{ item.diagnosis }}</td>
            <td>{{ item.date }}</td>

            <td class="d-flex gap-2">
              <v-btn size="small" variant="tonal" icon="mdi-eye" />
              <v-btn size="small" variant="tonal" icon="mdi-pencil" />
              <v-btn size="small" color="red" variant="tonal" icon="mdi-delete" />
            </td>
          </tr>
        </tbody>
      </v-table>

    </v-card>

  </AppLayout>
</template>

<style scoped>
.page-title {
  font-size: 26px;
  font-weight: 900;
}
</style>
