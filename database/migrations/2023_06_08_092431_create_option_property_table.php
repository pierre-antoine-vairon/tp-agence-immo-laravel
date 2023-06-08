<?php

use App\Models\Option;
use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crée une nouvelle table nommée 'option_property' dans la base de données
        Schema::create('option_property', function (Blueprint $table) {

            // Crée une colonne 'option_id' qui stocke des clés étrangères faisant référence à la table 'options'.
            // 'foreignIdFor(Option::class)' crée la colonne, 'constrained()' indique qu'il s'agit d'une clé étrangère, 
            // et 'cascadeOnDelete()' signifie que si un enregistrement dans la table 'options' est supprimé,
            // tous les enregistrements correspondants dans cette table seront également supprimés.
            $table->foreignIdFor(Option::class)->constrained()->cascadeOnDelete();

            // Fait de même pour 'property_id' en référence à la table 'properties'.
            $table->foreignIdFor(Property::class)->constrained()->cascadeOnDelete();

            // Définit une clé primaire composite pour la table. 
            // Cela signifie que la combinaison des colonnes 'option_id' et 'property_id' doit être unique 
            // pour chaque enregistrement de la table.
            $table->primary(['option_id', 'property_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_property');
    }
};
