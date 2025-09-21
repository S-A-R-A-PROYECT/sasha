<?php

namespace App\Filament\Resources\Clients\Pages;

use App\Filament\Resources\Clients\ClientResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;

class CreateClient extends CreateRecord
{
    protected $secretClient, $id;
    protected static string $resource = ClientResource::class;
    protected static bool $canCreateAnother = false;

    protected function handleRecordCreation(array $data): Model
    {
        $user = Auth::user();

        $client = app(ClientRepository::class)->createAuthorizationCodeGrantClient(
            user: $user,
            name: $data['name'],
            redirectUris: $data['redirect_uris']
        );

        $client->dev_color = $data['dev_color'];
        $client->teacher_color = $data['teacher_color'];
        $client->student_color = $data['teacher_color'];
        $client->logo = $data['logo'];
        $client->save();

        $this->secretClient = $client->plainSecret;
        $this->id = $client->id;

        return $client;
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Cliente registrado')
            ->body("Se ha creado un nuevo cliente. Recuerda anotar el Client ID y el Client SECRET. Esta no se repetirá \nID: " . $this->id . "\nSecret: " . $this->secretClient)
            ->persistent()
            ->send();
    }
}
