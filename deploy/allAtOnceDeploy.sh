#!/bin/bash

if [ "${CLUSTER_NAME}" = "development-vedagraceclinic-com" ]; then
  index=0
  taskArn=$(aws ecs list-tasks --cluster ${CLUSTER_NAME} --query "taskArns[${index}]" --output text)

  until [ "$taskArn" = "None" ]
  do 
    aws ecs stop-task --cluster ${CLUSTER_NAME} --task $taskArn
    ((index++))
    taskArn=$(aws ecs list-tasks --cluster ${CLUSTER_NAME} --query "taskArns[${index}]" --output text)
  done
fi

