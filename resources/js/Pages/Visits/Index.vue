<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const search = ref('')
</script>

<template>
  <Head title="Daftar Kunjungan" />

  <AppLayout>

    <!-- HEADER -->
    <div class="page-header">
      <div>
        <h1>Daftar Kunjungan Pasien</h1>
        <p class="text-muted">Data pasien yang terdaftar hari ini</p>
      </div>

      <Link href="/visits/create">
        <v-btn color="primary" prepend-icon="mdi-plus">
          Registrasi Kunjungan
        </v-btn>
      </Link>
    </div>

    <!-- STATS -->
    <v-row dense class="mt-6">
      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <strong>128</strong>
          <span>Total Kunjungan</span>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <strong>72</strong>
          <span>Menunggu</span>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <strong>41</strong>
          <span>Selesai</span>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="stat-card">
          <strong>15</strong>
          <span>Batal</span>
        </v-card>
      </v-col>
    </v-row>

    <!-- FILTER -->
    <v-card class="glass-card mt-6 pa-4">
      <v-row dense>
        <v-col cols="12" md="4">
          <v-text-field
            v-model="search"
            label="Cari Pasien / RM / Dokter"
            prepend-inner-icon="mdi-magnify"
            variant="outlined"
          />
        </v-col>

        <v-col cols="12" md="3">
          <v-select
            label="Status"
            :items="['Semua', 'Menunggu', 'Diproses', 'Selesai', 'Batal']"
          />
        </v-col>

        <v-col cols="12" md="3">
          <v-select
            label="Poli"
            :items="['Semua', 'Umum', 'Interna', 'Anak', 'Bedah']"
          />
        </v-col>
      </v-row>
    </v-card>

    <!-- TABLE -->
    <v-card class="glass-card mt-6 pa-2">

      <table class="table">
        <thead>
          <tr>
            <th>No Antrian</th>
            <th>Pasien</th>
            <th>RM</th>
            <th>Poli</th>
            <th>Dokter</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>A-021</td>
            <td>Ahmad Fauzi</td>
            <td>RM001</td>
            <td>Interna</td>
            <td>dr. Andi Wijaya</td>
            <td><span class="badge waiting">Menunggu</span></td>
            <td>08:15</td>
            <td class="actions">
              <v-btn icon size="small" variant="text">
                <v-icon size="18">mdi-eye</v-icon>
              </v-btn>

              <v-btn icon size="small" variant="text">
                <v-icon size="18">mdi-pencil</v-icon>
              </v-btn>

              <v-btn icon size="small" variant="text" color="red">
                <v-icon size="18">mdi-delete</v-icon>
              </v-btn>
            </td>
          </tr>

          <tr>
            <td>A-022</td>
            <td>Siti Rahma</td>
            <td>RM002</td>
            <td>Anak</td>
            <td>dr. Rina Kartika</td>
            <td><span class="badge done">Selesai</span></td>
            <td>08:22</td>
            <td class="actions">
              <v-btn icon size="small" variant="text">
                <v-icon size="18">mdi-eye</v-icon>
              </v-btn>

              <v-btn icon size="small" variant="text">
                <v-icon size="18">mdi-pencil</v-icon>
              </v-btn>

              <v-btn icon size="small" variant="text" color="red">
                <v-icon size="18">mdi-delete</v-icon>
              </v-btn>
            </td>
          </tr>
        </tbody>
      </table>

    </v-card>

  </AppLayout>
</template>

<style scoped>
.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.page-header h1 {
  font-size: 28px;
  font-weight: 900;
}

.text-muted {
  color: #94a3b8;
}

.glass-card {
  background: rgba(255,255,255,0.06);
  border-radius: 18px;
  border: 1px solid rgba(255,255,255,0.08);
}

.stat-card {
  background: rgba(255,255,255,0.06);
  border-radius: 16px;
  padding: 16px;
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.stat-card strong {
  font-size: 24px;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th {
  text-align: left;
  padding: 12px;
  color: #94a3b8;
  font-weight: 600;
}

.table td {
  padding: 12px;
  border-top: 1px solid rgba(255,255,255,0.08);
}

.actions {
  display: flex;
  gap: 6px;
}

/* Status badge */
.badge {
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 12px;
  font-weight: 700;
}

.waiting {
  background: rgba(245,158,11,0.2);
  color: #fbbf24;
}

.done {
  background: rgba(34,197,94,0.2);
  color: #22c55e;
}
</style>
