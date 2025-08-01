<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserAddress;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'birth_date',
        'gender',
        'role',
        'is_active',
        'avatar',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'last_login_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        // Asignar rol por defecto
        static::creating(function ($user) {
            if (empty($user->role)) {
                $user->role = 'customer';
            }
            if (!isset($user->is_active)) {
                $user->is_active = true;
            }
        });
    }

    // ==========================================
    // MÉTODOS DE ROLES Y PERMISOS
    // ==========================================

    /**
     * Verificar si el usuario es administrador
     */
    public function isAdmin()
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    /**
     * Verificar si el usuario es super administrador
     */
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    /**
     * Verificar si el usuario es administrador básico
     */
    public function isBasicAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Verificar si el usuario es cliente
     */
    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    /**
     * Verificar si el usuario tiene un rol específico
     */
    public function hasRole($role)
    {
        if (is_array($role)) {
            return in_array($this->role, $role);
        }
        return $this->role === $role;
    }

    /**
     * Verificar si el usuario puede acceder al panel de admin
     */
    public function canAccessAdmin()
    {
        return $this->isAdmin() && $this->is_active;
    }

    /**
     * Verificar permisos específicos basados en el rol
     */
    public function hasPermission($permission)
    {
        $permissions = $this->getPermissionsByRole();
        return in_array($permission, $permissions);
    }

    /**
     * Obtener permisos basados en el rol
     */
    private function getPermissionsByRole()
    {
        $permissions = [
            'super_admin' => [
                'manage_users',
                'manage_products',
                'manage_orders',
                'manage_categories',
                'manage_brands',
                'manage_collections',
                'manage_coupons',
                'manage_reviews',
                'manage_newsletter',
                'manage_support',
                'manage_inventory',
                'view_analytics',
                'manage_settings',
                'manage_reports',
                'manage_backups',
                'manage_system'
            ],
            'admin' => [
                'manage_products',
                'manage_orders',
                'manage_categories',
                'manage_brands',
                'manage_collections',
                'manage_coupons',
                'manage_reviews',
                'manage_newsletter',
                'manage_support',
                'manage_inventory',
                'view_analytics',
                'manage_reports'
            ],
            'customer' => []
        ];

        return $permissions[$this->role] ?? [];
    }

    /**
     * Verificar si el usuario está activo
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Activar usuario
     */
    public function activate()
    {
        $this->update(['is_active' => true]);
    }

    /**
     * Desactivar usuario
     */
    public function deactivate()
    {
        $this->update(['is_active' => false]);
    }

    /**
     * Obtener nombre completo del usuario o email si hay nombre.
     */
    public function getDisplayNameAttribute()
    {
        return $this->name ?: $this->email;
    }

    /**
     * Obteneer el Avatar del usuario.
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }

        // Generar un avatar por defecto si no se ha subido uno
        $initials = collect(explode(' ', $this->name))->map(function ($word) {
            return strtoupper(substr($word, 0, 1));
        })->join('');

        return 'https://ui-avatars.com/api/?name=' . urlencode($initials) . '&background=random';
    }

    /**
     * Obtener la etiqueta del rol del usuario.
     */
    public function getRoleLabelAttribute()
    {
        $labels = [
            'super_admin' => 'Super Administrador',
            'admin' => 'Administrador',
            'customer' => 'Cliente',
        ];

        return $labels[$this->role] ?? 'Desconocido';
    }

    /**
     * Obtener la etiqueta del estado de la cuenta.
     */
    public function getStatusLabelAttribute()
    {
        return $this->is_active ? 'Activo' : 'Inactivo';
    }

    /**
     * Registrar ultimo inicio de sesión.
     */
    public function updateLastLogin($ip = null)
    {
        $this->update([
            'last_login_at' => now(),
        ]);
    }

    // ==========================================
    // RELACIONES
    // ==========================================
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function shoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'recipient_id');
    }

    public function visits()
    {
        return $this->hasMany(SiteVisit::class);
    }

    public function productViews()
    {
        return $this->hasMany(ProductView::class);
    }

    public function searches()
    {
        return $this->hasMany(Search::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function assignedTickets()
    {
        return $this->hasMany(SupportTicket::class, 'assigned_to');
    }

    public function activityLogs()
    {
        return $this->hasMany(AdminActivityLog::class);
    }

    // ==========================================
    // SCOPES
    // ==========================================
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAdmins($query)
    {
        return $query->whereIn('role', ['admin', 'super_admin']);
    }

    public function scopeCustomers($query)
    {
        return $query->where('role', 'customer');
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // ==========================================
    // ACCESSORS
    // ==========================================

    public function getIsAdminAttribute()
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    // ==========================================
    // MÉTODOS ESTÁTICOS
    // ==========================================

    /**
     * Obtener todos los roles disponibles
     */
    public static function getAllRoles()
    {
        return [
            'super_admin' => 'Super Administrador',
            'admin' => 'Administrador',
            'customer' => 'Cliente',
        ];
    }
}
