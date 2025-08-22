<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\NotificationTemplate;
use Domain\Dashboard\Actions\NotificationTemplates\IndexNotificationTemplateAction;
use Domain\Dashboard\Actions\NotificationTemplates\SendNotificationTemplateAction;
use Domain\Dashboard\DataTransferToObject\NotificationTemplates\IndexNotificationTemplateData;
use Domain\Dashboard\DataTransferToObject\NotificationTemplates\SendNotificationTemplateData;
use Illuminate\Http\JsonResponse;

class NotificationTemplateController extends Controller
{
   public function index(IndexNotificationTemplateData $data): JsonResponse
   {
      return sendSuccessResponse(__('messages.get_data'), (new IndexNotificationTemplateAction())($data));
   }

   public function send(SendNotificationTemplateData $data, NotificationTemplate $notificationTemplate)
   {
      (new SendNotificationTemplateAction())($data, $notificationTemplate);

      return sendSuccessResponse(__('messages.get_data'));
   }

   public function destroy(NotificationTemplate $notificationTemplate): JsonResponse
   {
      $notificationTemplate->delete();

      return sendSuccessResponse(__('messages.delete_data'));
   }
}
