<?php

class CRM_Examplecivirulelogger_PopupLogger implements \Psr\Log\LoggerInterface {

  /**
   * Logs with an arbitrary level.
   *
   * @param mixed $level
   * @param string $message
   * @param array $context
   * @return null
   */
  public function log($level, $message, array $context = array()) {
    $session = CRM_Core_Session::singleton();
    foreach($context as $key => $value) {
      $message = str_replace('{'.$key.'}', $value, $message);
    }
    $session->setStatus($message, '', 'error');
  }

  /**
   * System is unusable.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function emergency($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::EMERGENCY, $message, $context);
  }
  /**
   * Action must be taken immediately.
   *
   * Example: Entire website down, database unavailable, etc. This should
   * trigger the SMS alerts and wake you up.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function alert($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::ALERT, $message, $context);
  }
  /**
   * Critical conditions.
   *
   * Example: Application component unavailable, unexpected exception.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function critical($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::CRITICAL, $message, $context);
  }
  /**
   * Runtime errors that do not require immediate action but should typically
   * be logged and monitored.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function error($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::ERROR, $message, $context);
  }
  /**
   * Exceptional occurrences that are not errors.
   *
   * Example: Use of deprecated APIs, poor use of an API, undesirable things
   * that are not necessarily wrong.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function warning($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::WARNING, $message, $context);
  }
  /**
   * Normal but significant events.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function notice($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::NOTICE, $message, $context);
  }
  /**
   * Interesting events.
   *
   * Example: User logs in, SQL logs.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function info($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::INFO, $message, $context);
  }
  /**
   * Detailed debug information.
   *
   * @param string $message
   * @param array  $context
   *
   * @return null
   */
  public function debug($message, array $context = array())
  {
    $this->log(\Psr\Log\LogLevel::DEBUG, $message, $context);
  }

}