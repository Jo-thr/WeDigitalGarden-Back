<?php

namespace App\Traits;

use Coreproc\NovaAuditingUserFields\CreatedBy;
use Coreproc\NovaAuditingUserFields\UpdatedBy;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Panel;

trait AuditNova
{

    /**
     * Get Panel for audit informations
     */
    public function getAudit()
    {
        return new Panel('Informations', $this->auditFields());
    }

    /**
     * Get informations on created and updated
     */
    protected function auditFields()
    {
        return [
            DateTime::make('Created At')->format('MM-DD-YYYY HH:mm:ss')->onlyOnDetail(),
            CreatedBy::make('Created By')->onlyOnDetail(),

            DateTime::make('Updated At')->format('MM-DD-YYYY HH:mm:ss')->onlyOnDetail(),
            UpdatedBy::make('Updated By')->onlyOnDetail(),
        ];
    }
}
