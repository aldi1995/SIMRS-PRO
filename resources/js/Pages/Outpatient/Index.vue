<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const rows = [
  { id: 1, patient: 'Ahmad Fauzi', clinic: 'Penyakit Dalam', doctor: 'dr. Andi', date: '2025-01-23', status: 'Menunggu' },
  { id: 2, patient: 'Siti Rahma', clinic: 'Anak', doctor: 'dr. Rina', date: '2025-01-23', status: 'Diproses' }
]
</script>

<template>
  <Head title="Rawat Jalan" />
  <AppLayout>

    <div class="page-header mb-5">
      <h1 class="page-title">Rawat Jalan</h1>
      <Link href="/outpatient/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Tambah</v-btn>
      </Link>
    </div>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th><th>Poli</th><th>Dokter</th><th>Tanggal</th><th>Status</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="r in rows" :key="r.id">
            <td>{{ r.patient }}</td>
            <td>{{ r.clinic }}</td>
            <td>{{ r.doctor }}</td>
            <td>{{ r.date }}</td>
            <td><v-chip color="blue">{{ r.status }}</v-chip></td>
            <td class="d-flex gap-2">
              <v-btn icon="mdi-eye" size="small" variant="tonal"/>
              <v-btn icon="mdi-pencil" size="small" variant="tonal"/>
              <v-btn icon="mdi-delete" size="small" color="red" variant="tonal"/>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
