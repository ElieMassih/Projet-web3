<?php

function displayAlert($id = "", $title = "", $message = "", $type = "", $dismiss = 1)
{
  $alert_output = '<div id="' . $id . '" class="alert ' . $type . '" role="alert" style="position: relative; padding: 1rem 1.5rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: 0.25rem; float: right;">';
  $alert_output .= '<img class="hidden" src onerror="dismissAlert(\'' . $id . '\',' . $dismiss . ')">';

  if ($type === "info") {
    $alert_output .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="alert-icon" style="display: inline-block; width: 1.5rem; height: 1.5rem; vertical-align: middle;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
      </svg>
      ';
  }
  if ($type === "error") {
    $alert_output .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="alert-icon" style="display: inline-block; width: 1.5rem; height: 1.5rem; vertical-align: middle;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
      </svg>
      ';
  }
  if ($type === "success") {
    $alert_output .= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="alert-icon" style="display: inline-block; width: 1.5rem; height: 1.5rem; vertical-align: middle;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>      
      ';
  }

  $alert_output .= '<span class="sr-only">Info</span>';
  $alert_output .= '<div class="alert-title" style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">' . $title . '</div>';
  $alert_output .= '<div class="alert-message" style="font-size: 1rem;">' . $message . '</div>';
  $alert_output .= '<button id="dismiss-alert-' . $id . '" type="button" class="alert-close-btn" data-dismiss-target="#' . $id . '" aria-label="Close" style="position: absolute; top: 0.5rem; right: 0.5rem; background: none; border: none; cursor: pointer;">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>';
  $alert_output .= '</div>';

  echo $alert_output;
}
?>
