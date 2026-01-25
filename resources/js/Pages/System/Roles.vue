<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const roles = ref([
  { name: 'Superadmin', users: 3, permissions: 120, status: 'Aktif' },
  { name: 'Admin', users: 6, permissions: 68, status: 'Aktif' },
  { name: 'Dokter', users: 12, permissions: 34, status: 'Aktif' },
  { name: 'Perawat', users: 18, permissions: 22, status: 'Aktif' },
  { name: 'Finance', users: 4, permissions: 20, status: 'Aktif' },
])
</script>

<template>
<AppLayout>

  <!-- HEADER -->
  <div class="mb-6">
    <h1 class="text-h5 font-weight-bold">Role & Permission</h1>
    <p class="text-muted">Manajemen hak akses pengguna sistem</p>
  </div>

  <!-- STATS -->
  <v-row class="mb-6" dense>
    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Total Role</div>
        <div class="stat-value">{{ roles.length }}</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Total User</div>
        <div class="stat-value">43</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Permission Aktif</div>
        <div class="stat-value">152</div>
      </v-card>
    </v-col>

    <v-col cols="12" md="3">
      <v-card class="glass-card pa-4">
        <div class="stat-title">Audit Aktif</div>
        <div class="stat-value">ON</div>
      </v-card>
    </v-col>
  </v-row>

  <!-- TABLE -->
  <v-card class="glass-card pa-6">

    <div class="d-flex justify-space-between align-center mb-4">
      <strong class="text-h6">Daftar Role</strong>

      <v-btn color="primary" prepend-icon="mdi-plus">
        Tambah Role
      </v-btn>
    </div>

    <v-table class="table-glass">
      <thead>
        <tr>
          <th>Role</th>
          <th>Jumlah User</th>
          <th>Permission</th>
          <th>Status</th>
          <th width="160">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="role in roles" :key="role.name">
          <td>{{ role.name }}</td>
          <td>{{ role.users }}</td>
          <td>{{ role.permissions }}</td>

          <td>
            <v-chip color="green" size="small">
              {{ role.status }}
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
  font-size: 1.8rem;
  font-weight: bold;
}

.table-glass {
  color: white;
}
</style>
