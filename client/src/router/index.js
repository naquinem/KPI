import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/Home.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Cycletime from '../pages/cycletime/Cycletime.vue';
import CycletimePercentile from '../pages/cycletime_percentile/CycletimePercentile.vue';
import DailyHitRate from '../pages/daily_hit_rate/DailyHitRate.vue';
import ExcessHours from '../pages/excess_hours/ExcessHours.vue';
import PlanningRequest from '../pages/planning_request/PlanningRequest.vue';
import RepairOutputPerHead from '../pages/repair_output/RepairOutputPerHead.vue';
import Summary from '../pages/Summary.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
        path: '/cycletime',
        name: 'cycletime',
        component: Cycletime
    },
    {
        path: '/cycletime-percentile',
        name: 'cycletime-percentile',
        component: CycletimePercentile
    },
    {
        path: '/daily-hit-rate',
        name: 'daily-hit-rate',
        component: DailyHitRate,
    },
    {
        path: '/excess-hours',
        name: 'excess-hours',
        component: ExcessHours
    },
    {
        path: '/planning-request',
        name: 'planning-request',
        component: PlanningRequest
    },
    {
        path: '/repair-output',
        name: 'repair-output',
        component: RepairOutputPerHead
    },
    {
        path: '/summary',
        name: 'summary',
        component: Summary
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
