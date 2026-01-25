<script setup>
import { ref, computed } from 'vue'
import { usePage, Link, router } from '@inertiajs/vue3'
import {
  VApp,
  VNavigationDrawer,
  VAppBar,
  VMain,
  VList,
  VListItem,
  VListItemTitle,
  VIcon,
  VSpacer,
  VBtn,
  VAvatar,
  VDivider,
  VListGroup,
  VDialog,
  VCard,
  VCardTitle,
  VCardText,
  VCardActions,
  VMenu
} from 'vuetify/components'

const drawer = ref(true)
const confirmLogout = ref(false)

const page = usePage()
const user = page.props.auth?.user
const roles = page.props.auth?.roles || []
const permissions = page.props.auth?.permissions || []

const logout = () => {
  router.post(route('logout'))
}

/* Permission Checker */
const can = (permission) => {
  return roles.includes('Super Admin') || permissions.includes(permission)
}

const menu = [

  { title: 'Dashboard', icon: 'mdi-view-dashboard', route: '/dashboard', permission: 'view dashboard' },

  {
    title: 'Pelayanan Medis',
    icon: 'mdi-stethoscope',
    children: [
      { title: 'Pasien', route: '/patients', permission: 'manage patients' },
      { title: 'Kunjungan', route: '/visits', permission: 'manage visits' },
      { title: 'Rekam Medis', route: '/medical-records/index', permission: 'manage medical records' },
      { title: 'IGD', route: '/igd', permission: 'manage visits' },
      { title: 'Rawat Jalan', route: '/outpatient', permission: 'manage visits' },
      { title: 'Rawat Inap', route: '/inpatient', permission: 'manage visits' },
      { title: 'Tindakan Medis', route: '/procedures', permission: 'manage medical records' }
    ]
  },

  {
    title: 'Penunjang',
    icon: 'mdi-flask',
    children: [
      { title: 'Laboratorium', route: '/laboratory', permission: 'manage medical records' },
      { title: 'Radiologi', route: '/radiology', permission: 'manage medical records' },
      { title: 'Farmasi', route: '/pharmacy', permission: 'manage pharmacy' }
    ]
  },

  {
    title: 'Keuangan',
    icon: 'mdi-cash-register',
    children: [
      { title: 'Billing', route: '/finance/billing', permission: 'manage billing' },
      { title: 'Kasir', route: '/finance/cashier', permission: 'manage cashier' },
      { title: 'Klaim BPJS', route: '/finance/bpjs', permission: 'manage billing' },
      { title: 'Akuntansi', route: '/finance/accounting', permission: 'manage billing' }
    ]
  },

  {
    title: 'SDM / HRIS',
    icon: 'mdi-account-group',
    children: [
      { title: 'Data Pegawai', route: '/hr/employees', permission: 'manage employees' },
      { title: 'Shift & Jadwal', route: '/hr/schedules', permission: 'manage employees' },
      { title: 'Payroll', route: '/hr/payroll', permission: 'manage payroll' }
    ]
  },

  {
    title: 'Logistik & Inventory',
    icon: 'mdi-warehouse',
    children: [
      { title: 'Stok Barang', route: '/inventory', permission: 'manage inventory' },
      { title: 'Aset Rumah Sakit', route: '/assets', permission: 'manage inventory' },
      { title: 'Supplier', route: '/suppliers', permission: 'manage inventory' }
    ]
  },

  {
    title: 'Manajemen',
    icon: 'mdi-chart-line',
    children: [
      { title: 'Dashboard Eksekutif', route: '/management/dashboard', permission: 'view executive dashboard' },
      { title: 'Laporan Rumah Sakit', route: '/management/reports', permission: 'view executive dashboard' },
      { title: 'Statistik RS', route: '/management/statistics', permission: 'view executive dashboard' }
    ]
  },

  {
    title: 'Integrasi',
    icon: 'mdi-api',
    children: [
      { title: 'BPJS V-Claim', route: '/integration/bpjs', permission: 'manage billing' },
      { title: 'SatuSehat', route: '/integration/satusehat', permission: 'manage medical records' },
      { title: 'Antrean Nasional', route: '/integration/antrian', permission: 'manage visits' },
      { title: 'API Manager', route: '/integration/api', permission: 'manage users' }
    ]
  },

  {
    title: 'Sistem',
    icon: 'mdi-cog',
    children: [
      { title: 'User Management', route: '/system/users', permission: 'manage users' },
      { title: 'Role & Permission', route: '/system/roles', permission: 'manage roles' },
      { title: 'Audit Log', route: '/system/audit-log', permission: 'manage roles' },
      { title: 'Master Data', route: '/system/master-data', permission: 'manage roles' },
      { title: 'Pengaturan Sistem', route: '/system/settings', permission: 'manage roles' }
    ]
  }
]

/* Filter menu dynamically */
const filteredMenu = computed(() => {
  return menu
    .map(group => {
      if (!group.children) {
        return can(group.permission) ? group : null
      }

      const children = group.children.filter(child => can(child.permission))

      return children.length ? { ...group, children } : null
    })
    .filter(Boolean)
})
</script>

<template>
  <v-app>

    <!-- SIDEBAR -->
    <v-navigation-drawer v-model="drawer" width="290" class="sidebar-glass">

      <div class="brand px-5 py-4">
        <strong class="text-h6">
          SIMRS<span class="text-primary">-PRO</span>
        </strong>
        <p class="brand-subtitle">Secure Healthcare System</p>
      </div>

      <v-divider class="mb-2" />

      <v-list nav density="comfortable">

        <template v-for="item in filteredMenu" :key="item.title">

          <v-list-item v-if="!item.children">
            <Link :href="item.route" class="sidebar-link">
              <v-icon :icon="item.icon" class="me-3" />
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </Link>
          </v-list-item>

          <v-list-group v-else>
            <template #activator="{ props }">
              <v-list-item v-bind="props">
                <template #prepend>
                  <v-icon :icon="item.icon" />
                </template>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
            </template>

            <v-list-item
              v-for="child in item.children"
              :key="child.title"
              class="ms-6"
            >
              <Link :href="child.route" class="sidebar-link">
                {{ child.title }}
              </Link>
            </v-list-item>

          </v-list-group>

        </template>

      </v-list>

    </v-navigation-drawer>

    <!-- TOP BAR -->
    <v-app-bar flat height="72" class="topbar-glass">

      <v-btn icon @click="drawer = !drawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>

      <v-spacer />

      <!-- PROFILE MENU -->
      <v-menu location="bottom end">

        <template #activator="{ props }">
          <v-btn v-bind="props" class="profile-btn" variant="text">
            <v-avatar size="36" color="primary">
              {{ user?.name?.charAt(0) }}
            </v-avatar>

            <span class="user-name">{{ user?.name }}</span>
            <v-icon size="18">mdi-chevron-down</v-icon>
          </v-btn>
        </template>

        <v-card class="profile-menu">

          <v-list density="compact">

            <v-list-item>
              <v-list-item-title class="font-weight-bold">
                {{ user?.name }}
              </v-list-item-title>
              <v-list-item-subtitle>
                {{ user?.email }}
              </v-list-item-subtitle>
            </v-list-item>

            <v-divider class="my-2" />

            <v-list-item link href="/profile">
              <template #prepend>
                <v-icon>mdi-account-edit</v-icon>
              </template>
              Edit Profile
            </v-list-item>

            <v-list-item link href="/system/settings">
              <template #prepend>
                <v-icon>mdi-cog</v-icon>
              </template>
              Pengaturan
            </v-list-item>

            <v-divider class="my-2" />

            <v-list-item @click="confirmLogout = true">
              <template #prepend>
                <v-icon color="red">mdi-logout</v-icon>
              </template>
              Logout
            </v-list-item>

          </v-list>

        </v-card>

      </v-menu>

    </v-app-bar>

    <!-- MAIN -->
    <v-main class="main-bg">
      <v-container fluid class="pa-6">
        <slot />
      </v-container>
    </v-main>

    <!-- LOGOUT MODAL -->
    <v-dialog v-model="confirmLogout" max-width="420">
      <v-card class="logout-solid">

        <v-card-title class="text-h6 font-weight-bold">
          Konfirmasi Logout
        </v-card-title>

        <v-card-text class="text-muted">
          Apakah Anda yakin ingin keluar dari SIMRS PRO?
        </v-card-text>

        <v-card-actions class="justify-end gap-2">
          <v-btn variant="outlined" @click="confirmLogout = false">
            Batal
          </v-btn>

          <v-btn color="red" @click="logout">
            Logout
          </v-btn>
        </v-card-actions>

      </v-card>
    </v-dialog>

  </v-app>
</template>

<style scoped>
.sidebar-glass {
  background: rgba(15, 23, 42, 0.96);
  border-right: 1px solid rgba(255, 255, 255, 0.08);
  color: #e5e7eb;
}

.brand-subtitle {
  font-size: 0.75rem;
  color: #94a3b8;
}

.topbar-glass {
  background: rgba(15, 23, 42, 0.95);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  color: white;
}

.user-name {
  font-size: 0.9rem;
  color: #cbd5f5;
}

.main-bg {
  background: linear-gradient(135deg, #020617, #0f172a);
  min-height: 100vh;
  color: white;
}

.sidebar-link {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: inherit;
}

.sidebar-link:hover {
  color: #60a5fa;
}

.profile-btn {
  display: flex;
  align-items: center;
  gap: 8px;
}

.profile-menu {
  background: #0f172a;
  border: 1px solid rgba(255,255,255,0.08);
  color: white;
  border-radius: 14px;
  min-width: 240px;
}

.logout-solid {
  background: #0f172a;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 14px;
  color: white;
}

.text-muted {
  color: #94a3b8;
}
</style>
