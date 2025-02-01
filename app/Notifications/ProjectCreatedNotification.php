<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectCreatedNotification extends Notification
{
    use Queueable;

    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Project Created: ' . $this->project->name)
            ->line('A new project has been created.')
            ->line('Project Name: ' . $this->project->name)
            ->line('Start Date: ' . $this->project->start_date->format('Y-m-d'))
            ->action('View Project', route('projects.show', $this->project->id))
            ->line('Thank you for using TeamFlow!');
    }

    public function toArray($notifiable)
    {
        return [
            'project_id' => $this->project->id,
            'project_name' => $this->project->name,
            'action' => 'created'
        ];
    }
}
