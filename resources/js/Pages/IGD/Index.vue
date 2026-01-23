<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const igd = [
  { id: 1, patient: 'Budi Santoso', triage: 'Merah', doctor: 'dr. Arif', status: 'Kritis' },
  { id: 2, patient: 'Ani Lestari', triage: 'Hijau', doctor: 'dr. Rina', status: 'Stabil' }
]
</script>

<template>
  <Head title="IGD" />

  <AppLayout>
    <div class="page-header mb-5">
      <h1 class="page-title">Pasien IGD</h1>

      <Link href="/igd/create">
        <v-btn color="primary" prepend-icon="mdi-plus">Registrasi IGD</v-btn>
      </Link>
    </div>

    <v-card class="glass-card pa-4">
      <v-table>
        <thead>
          <tr>
            <th>Pasien</th>
            <th>Triage</th>
            <th>Dokter</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="i in igd" :key="i.id">
            <td>{{ i.patient }}</td>
            <td><v-chip color="red">{{ i.triage }}</v-chip></td>
            <td>{{ i.doctor }}</td>
            <td>{{ i.status }}</td>
            <td class="d-flex gap-2">
              <v-btn icon="mdi-eye" size="small" variant="tonal" />
              <v-btn icon="mdi-pencil" size="small" variant="tonal" />
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card>
  </AppLayout>
</template>
