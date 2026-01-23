<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const patients = [
  { id: 1, rm: 'RM001', name: 'Ahmad Fauzi', nik: '3275012345678901', gender: 'Laki-laki', birth: '1990-08-12', status: 'Aktif' },
  { id: 2, rm: 'RM002', name: 'Siti Rahma', nik: '3275098765432100', gender: 'Perempuan', birth: '1995-03-22', status: 'Aktif' }
]
</script>

<template>
  <Head title="Data Pasien" />

  <AppLayout>

    <div class="page-header mb-5">
      <div>
        <h1 class="page-title">Data Pasien</h1>
        <p class="text-muted">Daftar pasien terdaftar</p>
      </div>

      <Link href="/patients/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Tambah Pasien</v-btn>
      </Link>
    </div>

    <v-text-field
      label="Cari RM / Nama / NIK"
      prepend-inner-icon="mdi-magnify"
      class="mb-4"
    />

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>No RM</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Gender</th>
            <th>Tgl Lahir</th>
            <th>Status</th>
            <th width="150">Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="p in patients" :key="p.id">
            <td>{{ p.rm }}</td>
            <td>{{ p.name }}</td>
            <td>{{ p.nik }}</td>
            <td>{{ p.gender }}</td>
            <td>{{ p.birth }}</td>
            <td>
              <v-chip color="green" size="small">{{ p.status }}</v-chip>
            </td>
            <td class="d-flex gap-2">
              <v-btn icon="mdi-eye" size="small" variant="tonal" />
              <v-btn icon="mdi-pencil" size="small" variant="tonal" />
              <v-btn icon="mdi-delete" size="small" color="red" variant="tonal" />
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

  </AppLayout>
</template>
