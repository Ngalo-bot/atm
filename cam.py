import cv2

# Specify video file path (replace with your video path)
video_path = ""

# Create a video capture object
cap = cv2.VideoCapture(video_path)

# Check if video opened successfully
if not cap.isOpened():
    print("Error opening video!")
    exit()

# Loop through video frames
while True:
    # Capture frame-by-frame
    ret, frame = cap.read()

    # If frame is read correctly ret will be True
    if not ret:
        print("Can't receive frame (stream end?). Exiting...")
        break

    # Display the resulting frame
    cv2.imshow('Video', frame)

    # Exit loop on 'q' key press
    if cv2.waitKey(1) == ord('q'):
        break

# Release the capture and close all windows
cap.release()
cv2.destroyAllWindows()

print("Video playback finished.")
