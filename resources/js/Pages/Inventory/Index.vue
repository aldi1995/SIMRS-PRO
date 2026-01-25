<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { ref } from 'vue'

const items = ref([
  {
    name: 'Infusion Set',
    category: 'Medis',
    stock: 120,
    status: 'Aman'
  },
  {
    name: 'Sarung Tangan',
    category: 'APD',
    stock: 8,
    status: 'Menipis'
  }
])
</script>

<template>
  <AppLayout>
    <v-card class="glass-card pa-6">

      <div class="d-flex justify-space-between mb-4">
        <div>
          <h2 class="text-h6 font-weight-bold">Inventory Rumah Sakit</h2>
          <p class="text-muted">Stok alat & barang medis</p>
        </div>

        <v-btn color="primary">
          <v-icon left>mdi-plus</v-icon>
          Tambah Barang
        </v-btn>
      </div>

      <v-data-table :items="items" class="glass-table">
        <template #headers>
          <tr>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Status</th>
            <th class="text-right">Aksi</th>
          </tr>
        </template>

        <template #item="{ item }">
          <tr>
            <td>{{ item.name }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.stock }}</td>

            <td>
              <v-chip
                :color="item.status === 'Aman' ? 'green' : 'orange'"
                size="small"
              >
                {{ item.status }}
              </v-chip>
            </td>

            <td class="text-right">
              <v-btn icon><v-icon>mdi-pencil</v-icon></v-btn>
              <v-btn icon color="red"><v-icon>mdi-delete</v-icon></v-btn>
            </td>
          </tr>
        </template>

      </v-data-table>
    </v-card>
  </AppLayout>
</template>
