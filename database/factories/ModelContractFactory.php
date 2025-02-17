<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => "Modèle 1",
            'content' => '{"time":1739795053189,"blocks":[{"id":"RFVlK5BzgQ","type":"header","data":{"text":"Contrat de bail pour location de box","level":2}},{"id":"opN9a2Ndf3","type":"paragraph","data":{"text":"1. Désignation des parties"}},{"id":"muuU-_4ahi","type":"paragraph","data":{"text":"Identité du bailleur :&nbsp;"}},{"id":"TN4uGBaxRs","type":"paragraph","data":{"text":"- Nom : %TENANT_LASTNAME%"}},{"id":"UE-W61a_fR","type":"paragraph","data":{"text":"- Prénom : %TENANT_FIRSTNAME%"}},{"id":"IY2LPH6uXq","type":"paragraph","data":{"text":"- Numéro de téléphone : %TENANT_PHONE%"}},{"id":"2bcXovo92k","type":"paragraph","data":{"text":"- Adresse mail : %TENANT_EMAIL%"}},{"id":"IC072AWWbY","type":"paragraph","data":{"text":"Identité du mandataire :&nbsp;"}},{"id":"qVG-wBuEht","type":"paragraph","data":{"text":"- Nom : %OWNER_NAME%"}},{"id":"ae1SFhUdRQ","type":"paragraph","data":{"text":"- Adresse mail : %TENANT_EMAIL%"}},{"id":"IiFewjqcje","type":"paragraph","data":{"text":"2. Objet du contrat"}},{"id":"NhTueF5y_f","type":"paragraph","data":{"text":"- Nom du box : %BOX_NAME%"}},{"id":"yeMLcfHfs6","type":"paragraph","data":{"text":"- Adresse : %BOX_ADDRESS%"}},{"id":"asePyh9_N9","type":"paragraph","data":{"text":"- Loyer : %BOX_PRICE% €/mois"}},{"id":"pAD5JfF7QA","type":"paragraph","data":{"text":"3. Date du contrat"}},{"id":"S-W7spRcln","type":"paragraph","data":{"text":"- Date de début : %START_DATE%"}},{"id":"Obb1s39MIb","type":"paragraph","data":{"text":"-&nbsp;Date de fin: %END_DATE%"}},{"id":"B58T4NQLgC","type":"paragraph","data":{"text":"____________________________________________________________________________________________"}},{"id":"71nuchlRK4","type":"paragraph","data":{"text":"Le %CONTRACT_DATE% à %CONTRACT_LOCATION%"}},{"id":"DWpUPBL59K","type":"paragraph","data":{"text":"Signature du bailleur :"}},{"id":"nA7SQQ_XJI","type":"paragraph","data":{"text":"Signature du locataire :"}}],"version":"2.31.0-rc.7"}',
        ];
    }
}
