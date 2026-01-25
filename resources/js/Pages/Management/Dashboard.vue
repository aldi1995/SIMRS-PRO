<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
</script>

<template>
  <AppLayout>
    <h1 class="text-h5 font-weight-bold mb-2">
      Dashboard Eksekutif
    </h1>

    <p class="text-muted mb-6">
      Ringkasan performa rumah sakit untuk Direksi & Manajemen
    </p>

    <!-- KPI CARDS -->
    <v-row dense class="mb-6">
      <v-col cols="12" md="3">
        <v-card class="glass-card pa-5">
          <div class="text-muted">Pendapatan Bulan Ini</div>
          <h2 class="text-success">Rp 2.4 M</h2>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="glass-card pa-5">
          <div class="text-muted">Pasien Aktif</div>
          <h2>428</h2>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="glass-card pa-5">
          <div class="text-muted">BOR (Bed Occupancy)</div>
          <h2 class="text-primary">72%</h2>
        </v-card>
      </v-col>

      <v-col cols="12" md="3">
        <v-card class="glass-card pa-5">
          <div class="text-muted">Kepuasan Pasien</div>
          <h2 class="text-info">91%</h2>
        </v-card>
      </v-col>
    </v-row>

    <!-- PERFORMANCE TABLE -->
    <v-card class="glass-card pa-5 mb-6">
      <h3 class="mb-3">Performa Unit</h3>

      <v-table>
        <thead>
          <tr>
            <th>Unit</th>
            <th>Pasien</th>
            <th>Pendapatan</th>
            <th>Status</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Rawat Jalan</td>
            <td>192</td>
            <td>Rp 890 Jt</td>
            <td class="text-success">Baik</td>
          </tr>

          <tr>
            <td>Rawat Inap</td>
            <td>104</td>
            <td>Rp 1.2 M</td>
            <td class="text-warning">Padat</td>
          </tr>

          <tr>
            <td>IGD</td>
            <td>86</td>
            <td>Rp 420 Jt</td>
            <td class="text-error">Overload</td>
          </tr>
        </tbody>
      </v-table>
    </v-card>

    <!-- EXECUTIVE INSIGHT -->
    <v-card class="glass-card pa-5">
      <h3 class="mb-3">Insight Direksi</h3>

      <ul class="text-muted">
        <li>BOR meningkat 8% dibanding bulan lalu</li>
        <li>Pendapatan Farmasi naik signifikan</li>
        <li>IGD overload — perlu tambahan shift</li>
        <li>Rata-rata LOS menurun menjadi 3.8 hari</li>
      </ul>
    </v-card>

  </AppLayout>
</template>

<style scoped>
.glass-card {
  background: rgba(15, 23, 42, 0.85);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 16px;
  color: white;
}

.text-muted {
  color: #94a3b8;
}
</style>
